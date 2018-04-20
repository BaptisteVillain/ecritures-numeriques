import Header from './Classes/Header'
import Rubriques from './Classes/Rubriques'
import TaxonomyTabs from './Classes/TaxonomyTabs'


const header = new Header(document.querySelector('.site-header'))

if (document.querySelector('.home-section.rubriques')) {
  const rubriques = new Rubriques(document.querySelector('.home-section.rubriques'))
}

if (document.querySelector('.taxonomy__related')) {
  const tabs = new TaxonomyTabs(document.querySelector('.taxonomy__related'))
}

