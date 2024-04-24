export default function findParentInArray(element, array){
    for(let possibleParent of array){
        if(possibleParent.contains(element) || possibleParent == element){
            return possibleParent;
        }
    }
    return null;
}