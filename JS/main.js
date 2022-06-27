
const menuHeader = document.querySelector('.js-header__body-menu-icon')

const modal = document.querySelector('.js-overlay')

const closeIcon = document.querySelector('.js-close-icon')

function openModal(){
    modal.classList.add('overlay-open');
}

function closeModal(){
    modal.classList.remove('overlay-open');
}

menuHeader.addEventListener('click', openModal)
closeIcon.addEventListener('click', closeModal)


const offerBackground = document.querySelector('.offers-home__background')
const offerHeading = document.querySelector('.offers-home__heading')

var arr_hinh = [
    "var(--overlay-color), url(\.\/assest\/img\/imgOffers\/1\.jpg)",
    "var(--overlay-color), url(\.\/assest\/img\/imgOffers\/2\.jpg)",
    "var(--overlay-color), url(\.\/assest\/img\/imgOffers\/3\.jpg)",
    "var(--overlay-color), url(\.\/assest\/img\/imgOffers\/4\.jpg)",
    "var(--overlay-color), url(\.\/assest\/img\/imgOffers\/5\.jpg)",
];

var arr_heading = [
    "sapa",
    "vịnh hạ long",
    "hội an",
    "bà nà-cù lao cham",
    "phú quốc"
]
var index = 0;
var len = arr_hinh.length;

offerBackground.style.backgroundImage = arr_hinh[0]
offerHeading.innerText = arr_heading[0]
// console.log(offerBackground.style.backgroundImage)
function nextImg(){
    index++;
    if(index > len-1){
        index = 0;
    }
    offerBackground.style.backgroundImage = arr_hinh[index]
    offerHeading.innerText = arr_heading[index]

}

setInterval("nextImg()", 5000)

const btnLeft = document.querySelector('.left')
const btnRight = document.querySelector('.right')
const listChoose = document.querySelector('.user_list')

btnLeft.onclick = function() {
    listChoose.style.display = 'block'
    btnLeft.style.display = 'none';
    btnRight.style.display = 'block';
}
btnRight.onclick = function() {
    listChoose.style.display = 'none'
    btnLeft.style.display = 'block';
    btnRight.style.display = 'none';
}

// window là biến đại diện cho của sổ trình duyệt
// documentElement chính là element html
//scrollTop: Lấy vị trí hiện tại của thanh cuộn nằm dọc của phần tử được chọn.
document.onscroll = function() {
    var scrollTop =  document.documentElement.scrollTop.toFixed()
    var headerNav = document.querySelector('.header__nav')
    var headerHeading = document.querySelector('.header__heading')

    if(scrollTop >= 180){
        headerHeading.style.display = 'none';
        headerNav.style.top = 0 + "px";
        headerNav.classList.add('header__nav-scroll')
        // console.log(heightHeader)
        // console.log("Cay")..
    }
    else{
        headerHeading.style.display = 'block';
        headerNav.style.top = 36 + "px";
        headerNav.classList.remove('header__nav-scroll')
    }
}

const messageIcon = document.querySelector('.offer-contact-mes')
const contactBody = document.querySelector('.offer-contact_body')
const contactExit = document.querySelector('.contact-body-exit')
const iconHand = document.querySelector('.icon-hand')
const iconHeart = document.querySelector('.icon-heart')


// console.log(contactBody)
messageIcon.onclick = function () {
    contactBody.style.display = 'block'
}
contactExit.onclick = function () {
    contactBody.style.display = 'none'
}

var contactTextarea = document.querySelector('#contact-input');
var contactContent = document.querySelector('.contact-content');
console.log([contactContent])
// console.log(contactTextarea.style)
contactTextarea.onkeyup = function (e) {
        // console.log(contactContent.clientHeight)
    if(contactTextarea.value !== ''){
        contactTextarea.style.width = 79 + '%';
        iconHand.style.display = "block";
        iconHeart.style.display = "none";
    }
    // console.log(e.which)
    if(e.which == 13) {
        const isScrolledToBottom = contactContent.scrollHeight - contactContent.clientHeight <= contactContent.scrollTop + 1
        
        console.log(`Vị trí của thanh cuộn ${contactContent.scrollTop}`)
        console.log(`Độ cao của phần tử bao gồm cả phần bị ẩn cũng như padding ${contactContent.scrollHeight}`)
        console.log(`Độ cao của phần tử ta css ${contactContent.clientHeight}`)
        // console.log(`Đọ cao của ${contactTextarea.style.height}`)
        if(contactTextarea.value.length > 1){
            var pNew = document.createElement("p")
            // pNew.classList.add('p-element');
            pNew.innerText = contactTextarea.value
            contactContent.append(pNew)
            

            // console.log(contactTextarea.value.length)
        }
        // console.log(pNew)
        // if (isScrolledToBottom) {
        //     out.scrollTop = out.scrollHeight - out.clientHeight
        //   }
          if(isScrolledToBottom) {
              contactContent.scrollTop = contactContent.scrollHeight - contactContent.clientHeight
          }
        contactTextarea.value = '';

        // contactTextarea.scrollTop  =  0;
        
        // console.log(`Đọ cao của ${contactTextarea.style.height}`)
        contactTextarea.style.height = 30 + "px";
        // console.log(`Đọ cao của ${contactTextarea.style.height}`)
        contactTextarea.style.width = 56 + '%';

        iconHand.style.display = "none";
        iconHeart.style.display = "block";
    }
}
// var pElement = document.querySelector('.p-element');
// pElement.onclick = function () {
//     alert("Nhu cu")
// }
// console.log(pElement)
contactTextarea.oninput = function () {
    if(contactTextarea.scrollTop > 0 ){
        contactTextarea.style.height = 60 + "px";
    }

    if(contactTextarea.value === ''){
        contactTextarea.style.width = 56 + '%';
        iconHand.style.display = "none";
        iconHeart.style.display = "block";
    }
}

iconHeart.onclick = function () {
    var spanHeart = document.createElement("span")
    spanHeart.innerHTML = '<i class="fas fa-heart"></i>'
    contactContent.append(spanHeart)
}

