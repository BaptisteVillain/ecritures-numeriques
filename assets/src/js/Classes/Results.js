import axios from 'axios'
import qs from 'qs'

class Results {
  constructor(container) {

    this.container = container
    this.results_buttons = container.querySelectorAll('.header__switch')
    this.results_tabs = container.querySelectorAll('.list__container')

    this.filters_visibility = container.querySelector('.header__button--filter')
    this.filters_container = container.querySelector('.results__filters')
    this.filters = container.querySelectorAll('.filter')

    this.containerToFix = container.querySelectorAll('.taxonomy-fix')

    this.selected_tab = 0
    this.selected_filters = []

    this.results_buttons.forEach(button => {
      button.addEventListener('click', e => {
        this.setTabs(e.srcElement.dataset.index)
      })
    })

    this.filters_visibility.addEventListener('click', () => {
      this.filters_container.classList.toggle('results__filters--active')
    })

    this.containerToFix.forEach(cont => {
      const { width } = cont.querySelector('li').getBoundingClientRect()
      cont.style.width = `${width * 2}px`
    })

    this.filters.forEach(filter => {
      filter.addEventListener('click', e => {
        this.toggleFilter(e.currentTarget)
        this.searchWithFilters()
      })
    })
  }

  setTabs(index) {
    if (this.selected_tab !== index) {
      this.results_tabs[this.selected_tab].classList.remove('list__container--active')
      this.results_buttons[this.selected_tab].classList.remove('header__button--active')

      this.results_tabs[index].classList.add('list__container--active')
      this.results_buttons[index].classList.add('header__button--active')

      this.selected_tab = index
    }
  }

  toggleFilter(element) {
    const filter = {
      slug: element.dataset.slug,
      taxonomy: element.dataset.taxonomy,
    }
    if (!element.classList.contains('filter--active')) {
      this.selected_filters.push(filter)
    } else {
      const index = this.selected_filters.findIndex(selected => {
        return selected.slug === filter.slug && selected.taxonomy === filter.taxonomy
      })
      this.selected_filters.splice(index, 1)
    }

    element.classList.toggle('filter--active')
  }

  clearFilter() {
    this.filters.forEach(filter => {
      filter.classList.remove('filter--active')
    })

    this.selected_filters = []
  }

  searchWithFilters() {
    const data = {
      action: 'search_filters',
      query: 'ezok',
      filters: this.selected_filters
    }

    axios.post(ajaxurl, qs.stringify(data))
      .then(response => {
        console.log(response)
      })
  }
}

module.exports = Results
