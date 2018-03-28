class Header {
  constructor(container) {
    this.header = container
    this.trigger = container.querySelector('.nav__trigger')
    this.nav = container.querySelector('.site-header__nav')
    this.dropDown = container.querySelector('.drop__trigger')

    this.trigger.addEventListener('click', (e) => {
      this.toggleNav()
    })

    this.dropDown.addEventListener('click', (e) => {
      e.preventDefault()
    })
  }

  toggleNav() {
    this.nav.classList.toggle('site-header__nav--hide')
  }
}

module.exports = Header
