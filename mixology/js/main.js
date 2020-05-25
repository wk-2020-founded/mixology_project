"use strict";

// { // tab_manu
//   const menu_items = document.querySelectorAll('.menu li a');
//   const contents = document.querySelectorAll('.contents');

//   menu_items.forEach( menu_item => {   
//     menu_item.addEventListener('click', e => {
//       e.preventDefault();
//       menu_items.forEach(item => {
//         item.classList.remove('active');
//       });
//       menu_item.classList.add('active');

//       contents.forEach(content => {
//         content.classList.remove('active');
//       });
//       document.getElementById(menu_item.dataset.id).classList.add('active');
//     });
//   });
// }

{
  const minus = document.querySelectorAll('.minus');
  const pulus = document.querySelectorAll('.pulus');

  minus.forEach( m => {
    m.addEventListener('click', () => {
      let count = Number(document.getElementById(m.dataset.id).textContent); 
      count--;
      document.getElementById(m.dataset.id).textContent = count;
    });
  });

  pulus.forEach( p => {
    p.addEventListener('click', () => {
      let count = Number(document.getElementById(p.dataset.id).textContent);
      count++;
      document.getElementById(p.dataset.id).textContent = count;
    });
  });

  const btn = document.querySelectorAll('.btn');
  const msg = document.querySelectorAll('.msg');
  const dynamic_form = document.getElementById('dynamic_form');
  const submit_btn = document.getElementById('submit_btn');
  let flag = false;

  msg.forEach(ms => {
    ms.classList.add('hide');
  });

  btn.forEach( b => {
    b.addEventListener('click', () => {
      sessionStorage.clear();
      while(dynamic_form.firstChild) {
        dynamic_form.removeChild(dynamic_form.firstChild);
      }
      let picks = document.querySelectorAll('.number');
      picks.forEach( pick => {
        if(Number(pick.textContent) > 0) {
          const input_1 = document.createElement('input');
          input_1.type = 'text';
          input_1.name = 'item_name[]';
          input_1.value = pick.id;
          const input_2 = document.createElement('input');
          input_2.type = 'number';
          input_2.name = 'pick_num[]';
          input_2.value = pick.textContent;
          const input_3 = document.createElement('input');
          input_3.type = 'number';
          input_3.name = 'price[]';
          input_3.value = pick.getAttribute("data-price");
          dynamic_form.appendChild(input_1);
          dynamic_form.appendChild(input_2);
          dynamic_form.appendChild(input_3);
          sessionStorage.setItem(pick.id,pick.textContent);
          flag = true;
        } 
      });
      if (flag === true) {
        submit_btn.click();
      } else {
        msg.forEach(ms => {
          ms.classList.remove('hide');
        });
        return;
      }  
    });
  });

  function storageAvailable(type) {
    try {
        let storage = window[type],
            x = '__storage_test__';
        storage.setItem(x, x);
        storage.removeItem(x);
        return true;
    } catch(e) {
      return e instanceof DOMException && (
        // everything except Firefox
        e.code === 22 ||
        // Firefox
        e.code === 1014 ||
        // test name field too, because code might not be present
        // everything except Firefox
        e.name === 'QuotaExceededError' ||
        // Firefox
        e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
        // acknowledge QuotaExceededError only if there's something already stored
        storage.length !== 0;
    }
  }

  window.addEventListener('load', () => {
    if(storageAvailable('sessionStorage') && sessionStorage.length > 0) {
      for (let i = 0; i < sessionStorage.length; i++) {
        document.getElementById(sessionStorage.key(i)).textContent = sessionStorage.getItem(sessionStorage.key(i));
      }
    }
  });
}
