import Header from './Classes/Header'
import Rubriques from './Classes/Rubriques'


const header = new Header(document.querySelector('.site-header'))

if (document.querySelector('.home-section.rubriques')) {
  const rubriques = new Rubriques(document.querySelector('.home-section.rubriques'))
}

