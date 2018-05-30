import Header from './Classes/Header'
import Rubrics from './Classes/Rubrics'
import TaxonomyTabs from './Classes/TaxonomyTabs'
import LoadMore from './Classes/LoadMore'


const header = new Header(document.querySelector('.site-header'))

if (document.querySelector('.home-section.rubrics')) {
  const homeRubrics = new Rubrics(document.querySelector('.home-section.rubrics'), true)
}

if (document.querySelector('.taxonomy__related')) {
  const tabs = new TaxonomyTabs(document.querySelector('.taxonomy__related'))
}

if (document.querySelector('.page-rubrics')) {
  const pageRubrics = new Rubrics(document.querySelector('.page-rubrics'), false)
}

if (document.querySelector('.publication__container')) {
  const loadMore = new LoadMore(document.querySelector('.publication__container'))
}