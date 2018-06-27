export default class Member {
  constructor(container) {
    this.container = container
    this.buttons = container.querySelectorAll('.button__anchor')

    this.sections_container = container.querySelector('.member__about')
    this.sections = container.querySelectorAll('.section__post')

    this.buttons.forEach(button => {
      button.addEventListener('click', (e) => {
        const index = Array.prototype.indexOf.call(this.buttons, e.currentTarget)
        this.scrollTo(index)
      })
    })
  }

  scrollTo(index) {
    const toTop = this.sections[index].getBoundingClientRect().top
    this.sections_container.scrollTo({
      top: toTop - 140,
      behavior: 'smooth'
    })
  }
}
