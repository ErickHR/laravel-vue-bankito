export default class Regex{

    aloneLetters( str ){
        let regex = new RegExp('^[A-z]+$')
        return regex.test(str);
    }

    aloneCell( number ){
        let regex = /^[1-9][0-9]{0,8}$/
        return regex.test(number)
    }

}