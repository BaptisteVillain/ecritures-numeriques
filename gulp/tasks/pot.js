/* eslint-disable */
import gulp        from 'gulp'
import gulpif      from 'gulp-if'
import del         from 'del'
import wpPot       from 'gulp-wp-pot'
import replace     from 'gulp-replace'
import rename      from 'gulp-rename'
import runSequence from 'run-sequence'

import {templates as config} from '../config'
/* eslint-enable */


/**
 * Generate POT file from all .php files in the theme,
 * including the cache folder.
 */
gulp.task('generate-pot', () => {
  return gulp.src(config.php_files)
    .pipe(wpPot({
      domain: config.text_domain
    }))
    .pipe(gulp.dest(config.destFolder + '/' + config.text_domain + '.pot'))
    .pipe(gulpif(config.keepCache, del([config.cacheFolder]).then(paths => {
      console.log('Deleted files and folders:\n', paths.join('\n'));
    })))
})

/**
 * Fake Twig Gettext Compiler
 *
 * Searches and replaces all occurences of __('string', 'domain'), _e('string', 'domain') and so on,
 * with <?php __('string', 'domain'); ?> or <?php _e('string', 'domain'); ?> and saves the content
 * in a .php file with the same name in the cache folder.
 *
 * Functions supported:
 *
 * Simple: __(), _e(), translate()
 * Plural: _n()
 * Disambiguation: _x(), _ex(), _nx()
 * Noop: _n_loop(), _nx_noop()
 *
 * TODO:
 * - Support translate_nooped_plural() function
 * - Skip gettext calls insied Twig comments (ex. {# __('string', 'domain') #})
 */
gulp.task('compile-twigs', () => {
  del([config.cacheFolder]).then(paths => {
    console.log('Deleted files and folders:\n', paths.join('\n'));
  })

  /**
   * __
   * _e
   * _x
   * _xn
   * _ex
   * _n_noop
   * _nx_noop
   * translate  -> Match __,  _e, _x and so on
   * \(         -> Match (
   * \s*?       -> Match empty space 0 or infinite times, as few times as possible (ungreedy)
   * [\'\"]     -> Match ' or "
   * .+?        -> Match any character, 1 to infinite times, as few times as possible (ungreedy)
   * ,          -> Match ,
   * .+?        -> Match any character, 1 to infinite times, as few times as possible (ungreedy)
   * \)         -> Match )
   */
  const gettext_regex = {

    // _e( "text", "domain" )
    // __( "text", "domain" )
    // translate( "text", "domain" )
    // esc_attr__( "text", "domain" )
    // esc_attr_e( "text", "domain" )
    // esc_html__( "text", "domain" )
    // esc_html_e( "text", "domain" )
    simple: /(__|_e|translate|esc_attr__|esc_attr_e|esc_html__|esc_html_e)\(\s*?[\'\"].+?[\'\"]\s*?,\s*?[\'\"].+?[\'\"]\s*?\)/g,

    // _n( "single", "plural", number, "domain" )
    plural: /_n\(\s*?[\'\"].*?[\'\"]\s*?,\s*?[\'\"].*?[\'\"]\s*?,\s*?.+?\s*?,\s*?[\'\"].+?[\'\"]\s*?\)/g,

    // _x( "text", "context", "domain" )
    // _ex( "text", "context", "domain" )
    // esc_attr_x( "text", "context", "domain" )
    // esc_html_x( "text", "context", "domain" )
    // _nx( "single", "plural", "number", "context", "domain" )
    disambiguation: /(_x|_ex|_nx|esc_attr_x|esc_html_x)\(\s*?[\'\"].+?[\'\"]\s*?,\s*?[\'\"].+?[\'\"]\s*?,\s*?[\'\"].+?[\'\"]\s*?\)/g,

    // _n_noop( "singular", "plural", "domain" )
    // _nx_noop( "singular", "plural", "context", "domain" )
    noop: /(_n_noop|_nx_noop)\((\s*?[\'\"].+?[\'\"]\s*?),(\s*?[\'\"]\w+?[\'\"]\s*?,){0,1}\s*?[\'\"].+?[\'\"]\s*?\)/g
  }

  // Iterate over .twig files
  return gulp.src(config.twig_files)

    // Search for Gettext function calls and wrap them around PHP tags. 
    .pipe(replace(gettext_regex.simple, match => {
      return '<?php ' + match + '; ?>'
    }))
    .pipe(replace(gettext_regex.plural, match => {
      return '<?php ' + match + '; ?>'
    }))
    .pipe(replace(gettext_regex.disambiguation, match => {
      return '<?php ' + match + '; ?>'
    }))
    .pipe(replace(gettext_regex.noop, match => {
      return '<?php ' + match + '; ?>'
    }))

    // Rename file with .php extension
    .pipe(rename(file_path => {
      file_path.extname = '.php'
    }))

    // Output the result to the cache folder as a .php file.
    .pipe(gulp.dest(config.cacheFolder))
})


/**
 * Main Task
 */
gulp.task('pot', done => {
  gulp.series('compile-twigs', 'generate-pot')
  done();
})