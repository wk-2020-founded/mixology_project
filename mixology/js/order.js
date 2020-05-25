"use strict";

{
  const prices = document.querySelectorAll('.price');
  const pick_nums = document.querySelectorAll('.pick_num');
  const amount = document.getElementById('amount');
  let total = [];
  
  for(let i = 0; i < prices.length; i++) {
    let price = Number(prices[i].textContent);
    let pick_num = Number(pick_nums[i].textContent);
    total.push(price * pick_num);
  }
  let sum = total.reduce((a,b) => a + b);

  amount.textContent = sum.toLocaleString();

  const submit = document.getElementById('submit');
  const total_amount = document.getElementById('total_amount');
  const input = document.querySelector('input[name="total_amount"]');
  
  submit.addEventListener('click', () => {
    input.value = total_amount.textContent;
  });

}