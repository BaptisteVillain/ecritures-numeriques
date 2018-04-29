class TaxonomyTabs {
  constructor(container) {
    this.container = container
    this.tabs = container.querySelectorAll('section.related__section')
    this.buttons = container.querySelectorAll('button.header__button')
    this.wrapper = container.querySelector('.related__container')
    this.return = container.querySelector('.related__return')
    this.tabsWrapper = container.querySelector('.related__wrapper')
    this.last_index = 0

    this.buttons.forEach(button => {
      button.addEventListener('click', e => {
        const { index } = e.currentTarget.dataset

        if (index !== this.last_index) {
          this.buttons[this.last_index].classList.remove('active')
          this.tabs[this.last_index].classList.remove('active')

          this.buttons[index].classList.add('active')
          this.tabs[index].classList.add('active')

          this.last_index = index
        }

        if (window.innerWidth <= 700) {
          this.wrapper.classList.add('container--slide')
          this.tabsWrapper.classList.remove('wrapper--hide')
        }
      })
    })

    this.return.addEventListener('click', () => {
      if (window.innerWidth <= 700) {
        this.wrapper.classList.remove('container--slide')
        this.tabsWrapper.classList.add('wrapper--hide')
      }
    })
  }
}

module.exports = TaxonomyTabs
