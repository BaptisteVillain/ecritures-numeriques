class Rubriques {
  constructor(container) {
    this.container = container
    this.buttons = container.querySelectorAll('.item__button')
    this.wrappers = container.querySelectorAll('.item__wrapper')
    this.last_index = null;

    this.buttons.forEach(button => {
      button.addEventListener('click', e => {
        e.preventDefault()

        const index = Array.prototype.indexOf.call(this.buttons, button)

        button.classList.add('active')
        this.wrappers[index].style.height = `${this.wrappers[index].childElementCount * 60}px`
        this.container.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'nearest' })

        this.wrappers.forEach((wrapper, i) => {
          if (i !== index || index === this.last_index) {
            wrapper.style.height = 0
            this.buttons[i].classList.remove('active')
          }
        })

        this.last_index = this.last_index === index ? null : index
      })
    })
  }
}

module.exports = Rubriques
