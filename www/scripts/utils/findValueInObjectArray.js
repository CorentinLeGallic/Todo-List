export default function findValueInObjectArray(array, property, value) {
    for (let object of array) {
        if (object[property] == value) {
            return object
        }
    }
}