class Header {
  constructor(container) {
    this.header = container
    this.trigger = container.querySelector('.nav__trigger')
    this.nav = container.querySelector('.site-header__nav')

    this.trigger.addEventListener('click', () => {
      this.toggleNav()
    })
  }

  toggleNav() {
    console.log('click')
    this.nav.classList.toggle('site-header__nav--hide')
  }
}

module.exports = Header
