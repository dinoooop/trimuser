import { sv } from "../helpers/sv";

// form helpers
export class fm {

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
