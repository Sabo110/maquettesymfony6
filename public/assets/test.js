console.log('salut salut les pros')
let xhr = new XMLHttpRequest
xhr.onreadystatechange = () =>{
    if(xhr.readyState === 4 && xhr.status === 200)
    {
        console.log(xhr.response)
    }
}

xhr.open('GET', 'http://127.0.0.1:8000/api/list', true)
xhr.responseType = 'json'
xhr.send()
