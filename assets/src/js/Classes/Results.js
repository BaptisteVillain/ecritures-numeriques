import axios from 'axios'
import qs from 'qs'

class Results {
  constructor(container) {

    this.container = container
    this.results_buttons = container.querySelectorAll('.header__switch')
    this.results_count = container.querySelectorAll('.header__button span')

    this.results_tabs = container.querySelectorAll('.list__container')
    this.results_container = container.querySelectorAll('.list')

    this.results_selected = container.querySelector('.results__selected-filters')
    this.results_selected_container = container.querySelector('.selected__container')
    this.results_selected_delete = container.querySelector('.selected__delete')
    this.results_selected_model = container.querySelector('.item--model')
    this.results_selected_items = []

    this.filters_visibility = container.querySelector('.header__button--filter')
    this.filters_container = container.querySelector('.results__filters')
    this.filters = container.querySelectorAll('.filter')

    this.containerToFix = container.querySelectorAll('.taxonomy-fix')

    this.cards_loading = container.querySelectorAll('.card--loading')
    this.cards_no_results = container.querySelectorAll('.card--no-result')

    this.selected_tab = 0
    this.selected_filters = []
    this.available_filters = []

    this.results_buttons.forEach(button => {
      button.addEventListener('click', e => {
        this.setTabs(e.currentTarget.dataset.index)
      })
    })

    this.filters_visibility.addEventListener('click', () => {
      this.filters_container.classList.toggle('results__filters--active')
    })

    if (window.innerHeight >= 700) {
      this.containerToFix.forEach(cont => {
        const { width } = cont.querySelector('li').getBoundingClientRect()
        cont.style.width = `${width * 2}px`
      })
    }

    this.filters.forEach(filter => {
      filter.addEventListener('click', e => {
        this.toggleFilter(e.currentTarget)
        this.search()
      })
    })

    this.results_selected_delete.addEventListener('click', () => {
      this.clearFilter()
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
      name: element.dataset.name
    }
    if (!element.classList.contains('filter--active')) {
      this.selected_filters.push(filter)
      this.addFilter(filter)
      element.classList.add('filter--active')
    } else {
      this.removeFilter(filter)
      element.classList.remove('filter--active')
    }
  }

  addFilter(filter) {
    const element = this.results_selected_model.cloneNode(true)
    element.querySelector('.item__label').textContent = filter.name
    element.dataset.slug = filter.slug
    element.classList.remove('item--model')

    this.results_selected_container.appendChild(element)
    this.results_selected_items.push(element)

    element.querySelector('.item__delete').addEventListener('click', e => {
      const fil = {
        slug: e.currentTarget.parentNode.dataset.slug,
        taxonomy: e.currentTarget.parentNode.dataset.taxonomy,
        name: e.currentTarget.parentNode.dataset.name
      }

      this.removeFilter(fil)
      this.search()
    })
    this.setSelectedVisibility()
  }

  removeFilter(filter) {
    const element = document.querySelector(`.selected__item[data-slug=${filter.slug}]`)
    element.remove()

    const button = document.querySelector(`.taxonomy__filters .filter[data-slug=${filter.slug}]`)
    button.classList.remove('filter--active')

    const index = this.selected_filters.findIndex(selected => {
      return selected.slug === filter.slug && selected.taxonomy === filter.taxonomy
    })
    this.selected_filters.splice(index, 1)

    this.setSelectedVisibility()
    this.updateFiltersVisibility()
  }

  clearFilter() {
    this.filters.forEach(filter => {
      filter.classList.remove('filter--active')
    })
    this.selected_filters = []

    this.results_selected_items.forEach(item => {
      item.remove()
    })

    this.setSelectedVisibility()

    this.search()
  }

  setSelectedVisibility() {
    if (this.selected_filters.length > 0) {
      this.results_selected.classList.add('results__selected-filters--active')
    } else {
      this.results_selected.classList.remove('results__selected-filters--active')
    }
  }

  updateFiltersVisibility() {
    this.filters.forEach(filter => {
      if (this.available_filters.indexOf(filter.dataset.slug) === -1) {
        filter.classList.add('filter--inactive')
        filter.classList.remove('filter--active')
      } else {
        filter.classList.remove('filter--inactive')
      }
    })
  }

  search() {
    const data = {
      action: 'search_filters',
      query: searchquery,
      filters: this.selected_filters
    }

    this.results_container.forEach(container => {
      container.innerHTML = ''
    })

    this.cards_loading.forEach(card => {
      card.classList.remove('card--hide')
    })
    this.cards_no_results.forEach(card => {
      card.classList.add('card--hide')
    })

    axios.post(ajaxurl, qs.stringify(data))
      .then(response => {
        this.cards_loading.forEach(card => {
          card.classList.add('card--hide')
        })
        this.results_container.forEach((container, index) => {
          this.results_count[index].innerHTML = response.data.data.results[index].length
          response.data.data.results[index].forEach(result => {
            container.insertAdjacentHTML('beforeend', result)
          })

          if (response.data.data.results[index].length === 0) {
            this.cards_no_results[index].classList.remove('card--hide')
          }
        })

        this.available_filters = response.data.data.available_filters
        this.updateFiltersVisibility()
      })
  }
}

module.exports = Results
