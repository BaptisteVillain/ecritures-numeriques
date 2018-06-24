export default class Publications {
  constructor(container) {
    this.container = container
    this.header_list = container.querySelector('.header__list')
    this.header_items = container.querySelectorAll('.header__item button')
    this.header_prev = container.querySelector('.header__nav--prev')
    this.header_next = container.querySelector('.header__nav--next')
    this.header_index = undefined
    this.header_offset = 5
    this.header_offsetWidth = this.header_list.parentNode.offsetWidth / 5

    this.header_items.forEach((item, index) => {
      if (item.classList.contains('item--active')) {
        this.header_index = index
      }
    })

    this.header_next.addEventListener('click', () => {
      if (this.header_index < this.header_items.length - 1) {
        this.updateHeader(this.header_index + 1)
      }
    })

    this.header_prev.addEventListener('click', () => {
      if (this.header_index >= 1) {
        this.updateHeader(this.header_index - 1)
      }
    })
  }

  updateHeader(newIndex) {
    // console.log(this.header_index)
    // console.log(newIndex)
    this.header_items[this.header_index].classList.remove('item--active')

    this.header_index = newIndex
    this.header_items[this.header_index].classList.add('item--active')

    if (this.header_index <= 0) {
      this.header_prev.classList.add('header__nav--disable')
    } else if (this.header_index >= this.header_items.length - 1) {
      this.header_next.classList.add('header__nav--disable')
    } else {
      this.header_next.classList.remove('header__nav--disable')
      this.header_prev.classList.remove('header__nav--disable')
    }

    console.log(this.header_index - this.header_offset)
    if (this.header_index - this.header_offset >= 0) {
      const offset = ((this.header_index - this.header_offset) + 1) * this.header_offsetWidth

      this.header_list.style.transform = `translateX(-${offset}px)`
    } else {
      this.header_list.style.transform = 'translateX(0px)'
    }
  }
}
