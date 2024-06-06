import store from '../store'
import { sv } from './sv'

// Basic functions
export class bc {

  static has(roles) {
    if (roles === 'all') { return true }
    const userRoles = store.getState().auth?.user?.roles || []
    const userRoleNames = userRoles.map(role => role.name)
    const rolesToCheck = roles.split('|')
    return rolesToCheck.some(role => userRoleNames.includes(role))
  }

  static inArrayObject(arobj, needle, property = 'id') {
    if (!arobj) { return false }
    return arobj.some(obj => obj[property] === needle)
  }

  static toggleArrayItem(array, item) {

    const itemToToggle = isNaN(item) ? item : Number(item)

    if (!array) {
      return [itemToToggle]
    }

    const index = array.indexOf(itemToToggle)

    if (index > -1) {
      return [...array.slice(0, index), ...array.slice(index + 1)]
    } else {
      return [...array, itemToToggle]
    }
  }

  static pluckIds(arr) {
    if (!arr) { return [] }
    return arr.map(obj => obj.id)
  }

  static getLabel(name) {
    let parts = name.split('_');
    parts[0] = parts[0].charAt(0).toUpperCase() + parts[0].slice(1);
    return parts.join(' ');
  }

  static getOptions(optionType) {

    switch (optionType) {
      case "role":
        return sv.role()
      case "hobbies":
        return []
      case "status":
        return sv.status()
      default:
        return []
    }
  }

}
