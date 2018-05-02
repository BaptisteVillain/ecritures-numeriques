import axios from 'axios'
import qs from 'qs'

export default class LoadMore {
  constructor() {
    const data = {
      action: 'publication_load_more'
    }

    axios.post(ajaxurl, qs.stringify(data))
      .then(res => {
        console.log(res)
      })
      .catch(err => {
        console.log(err)
      })
  }
}
