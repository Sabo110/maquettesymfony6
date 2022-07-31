let liste2 = document.getElementById('liste2')
let Menu = document.getElementById('po');
liste2.addEventListener('mouseover',()=>{
    Menu.classList.add('bg');
    
})

liste2.addEventListener('mouseout',()=>{
    Menu.classList.remove('bg');
})
let tableau = document.querySelector('.tab')
let xhr = new XMLHttpRequest()
let reponse
xhr.onreadystatechange = () =>{
    if(xhr.readyState === 4 && xhr.status === 200)
    {
         reponse = xhr.response['hydra:member']
        if(reponse.length > 0)
        {
            reponse.sort((a,b) =>{
                if(a.service.toLowerCase() < b.service.toLowerCase())
                {
                    return -1
                }
                else if(a.service.toLowerCase() > b.service.toLowerCase())
                {
                    return 1
                }
                else
                {
                    return 0
                }})
            // tableau.innerHTML = `
            // <tr class="ent">
            //     <th>service</th>
            //     <th>besoins</th>
            //     <th>quantite</th>
            //     <th>en stock</th>
            //     <th>date</th>
            //     <th>action</th>
            // </tr>
            // `
            reponse.forEach(element => {
                document.querySelector('.tbody').innerHTML +=  `
                <tr class="bordure" id="change">
                    <td>${element.service}</td>
                    <td>${element.besoin}</td>
                    <td>${element.quantite}</td>
                    <td>${element.qtstock}</td>
                    <td>${element.dat}</td>
                    <td>
                        <a href=""><img  src="" alt="" width="25" height="25"></a>
                    </td>
                </tr>
                `
            });
            
        }
        
        
    }
}


xhr.open('GET', 'http://127.0.0.1:8001/api/services', true)
xhr.responseType = 'json'
xhr.send()



document.querySelector('#barrech').addEventListener('input', (e) =>{

    // tableau.innerHTML = ''
    document.querySelector('.tbody').innerHTML = ''
    let change = reponse.filter(element =>{
        return element.service.includes(e.target.value) || element.besoin.includes(e.target.value)
    })
    change.forEach(element => {
        document.querySelector('.tbody').innerHTML +=  `
            <tr class="bordure" id="change">
                <td>${element.service}</td>
                <td>${element.besoin}</td>
                <td>${element.quantite}</td>
                <td>${element.qtstock}</td>
                <td>${element.dat}</td>
                <td>
                    <a href=""><img  src="" alt="" width="25" height="25"></a>
                </td>
            </tr>
        `
    })

})
    




