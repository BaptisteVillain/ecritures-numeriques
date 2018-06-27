import axios from 'axios'
import qs from 'qs'

export default class LoadMore {
  constructor(container) {
    this.container = container
    this.footer = document.querySelector('footer.site-footer')
    this.wait = false
    this.page = 1
    this.date = vars.postDate
    this.id = vars.postID

    this.select = {}

    this.card_scroll = document.querySelector('.card__scroll')
    this.card_end = document.querySelector('.card__end')

    window.addEventListener('scroll', () => {
      const scrollBottom = document.body.scrollHeight - document.documentElement.scrollTop - (window.innerHeight + this.footer.offsetHeight)

      if (scrollBottom <= (window.innerHeight * 2) && !this.wait) {
        this.addPost()
        this.wait = true
      }
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
        res.data.data.posts.forEach(post => {
          this.container.insertAdjacentHTML('beforeend', post.content)
        })
        this.page += 1
        this.wait = false

        if (res.data.data.posts.length === 0) {
          this.card_scroll.classList.add('card--hide')
          this.card_end.classList.remove('card--hide')
        }
      })
      .catch(() => {
        this.card_scroll.classList.add('card--hide')
        this.card_end.classList.remove('card--hide')
      })
  }
}
