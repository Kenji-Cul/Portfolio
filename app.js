const controlBtns = document.querySelectorAll('.control');
const sectionDivs = document.querySelectorAll('.section');
const controlCarrier = document.querySelectorAll('.controls');
const carrierSection = document.querySelector('.carrier');



function pageFunctions(){
    //Click on button change styles
    for(let i = 0; i < controlBtns.length; i++){
        controlBtns[i].addEventListener('click',function(){
            let currentBtn = document.querySelectorAll('.activebtn');
            currentBtn[0].className = currentBtn[0].className.replace('activebtn','');
            this.className += ' activebtn';
            const id = this.id;
            if(id){
                        controlBtns.forEach((btn)=>{
                            btn.classList.remove('active');
                        })
                        this.classList.add('active');
            
                        sectionDivs.forEach((section)=>{
                            section.classList.remove('active');
                        })

                        const concatid = `.${id}`;
                       
            
                        const element = document.querySelector(concatid);
                        element.classList.add('active');
                    }
        })
    }

     //Toggle Theme
const themeBtn = document.querySelector('.theme-btn');
themeBtn.addEventListener('click',()=>{
    let element = document.body;
    element.classList.toggle('dark-mode');
})

}
//

pageFunctions();


let cancelimg = document.querySelectorAll('.success svg');
let successdiv = document.querySelectorAll('.success');

for(let i = 0; i < cancelimg.length; i++){
    cancelimg[i].addEventListener('click',()=>{
        for(let i =0; i < successdiv.length; i++){
            successdiv[i].style.visibility = "hidden";
        }
    })
}




cancelimg.onclick = function(){
  successdiv.style.visibility = "hidden";
}


 

