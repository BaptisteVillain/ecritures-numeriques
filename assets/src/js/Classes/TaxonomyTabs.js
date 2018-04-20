class TaxonomyTabs {
  constructor(container) {
    this.container = container
    this.tabs = container.querySelectorAll('section.related__section')
    this.buttons = container.querySelectorAll('button.header__button')
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
      })
    });
  }
}

module.exports = TaxonomyTabs
