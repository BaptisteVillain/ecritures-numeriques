class Header {
  constructor(container) {
    this.header = container
    this.trigger = container.querySelector('.site-header__nav-trigger')
    this.wrapper = container.querySelector('.site-header__wrapper')
    this.dropDown = container.querySelector('.drop__trigger')

    this.trigger.addEventListener('click', (e) => {
      this.toggleVisibility()
    })

    this.dropDown.addEventListener('click', (e) => {
      e.preventDefault()
    })
  }

  toggleVisibility() {
    this.wrapper.classList.toggle('site-header__wrapper--hide')
  }
}

module.exports = Header
