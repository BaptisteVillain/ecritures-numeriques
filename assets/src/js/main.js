import Header from './Classes/Header'
import HomeRubrics from './Classes/HomeRubrics'
import TaxonomyTabs from './Classes/TaxonomyTabs'


const header = new Header(document.querySelector('.site-header'))

if (document.querySelector('.home-section.rubrics')) {
  const homeRubrics = new HomeRubrics(document.querySelector('.home-section.rubrics'), true)
}

if (document.querySelector('.taxonomy__related')) {
  const tabs = new TaxonomyTabs(document.querySelector('.taxonomy__related'))
}

if (document.querySelector('.page-rubrics')) {
  const pageRubrics = new HomeRubrics(document.querySelector('.page-rubrics'), false)
}