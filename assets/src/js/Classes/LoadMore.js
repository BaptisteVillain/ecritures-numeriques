import axios from 'axios'
import qs from 'qs'

export default class LoadMore {
  constructor(container) {

    this.container = container
    this.footer = document.querySelector('footer.site-footer')
    this.wait = false
    this.id = vars.postID
    this.page = 1
    this.date = vars.postDate
    this.posts = this.container.querySelectorAll('.publication-wrapper')
    this.title = ''
    this.select = {
      title: '',
      path: ''
    }

    window.addEventListener('scroll', e => {
      const scrollBottom = document.body.scrollHeight - document.documentElement.scrollTop
      - (window.innerHeight + this.footer.offsetHeight)

      if (scrollBottom <= (window.innerHeight * 2) && !this.wait) {
        this.addPost()
        this.wait = true
      }

      this.getActive()
    })
  }

  addPost() {
    const data = {
      action: 'publication_load_more',
      post_date: this.date,
      post_id: this.id,
      page: this.page
    }

    axios.post(ajaxurl, qs.stringify(data))
      .then(res => {
        console.log(res)
        res.data.data.posts.forEach(post => {
          this.container.insertAdjacentHTML('beforeend', post.content)
        })
        this.posts = this.container.querySelectorAll('.publication-wrapper')
        this.page += 1
        this.wait = false
      })
      .catch(err => {
        console.log(err)
      })
  }

  getActive() {
    let select = {}
    this.posts.forEach(post => {
      const { top } = post.getBoundingClientRect()
      if (top < window.innerHeight / 2 && top > 0) {
        select = {
          title: post.dataset.title,
          path: post.dataset.path
        }
      }
    })
    if (this.select.title !== select.title && select.title !== undefined) {
      this.select = select
      this.updatePage()
      console.log(this.select.title)
    }
  }

  updatePage() {
    document.title = `${this.select.title} - Ecritures Numeriques`
    history.pushState(null, null, this.select.path)
  }
}
