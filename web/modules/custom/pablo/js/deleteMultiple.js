const deleteMultipleBtn = document.querySelector('.cats-delete-multiple');
const modalDeleteMultiple = document.querySelector('.form-delete-multiple');
const multipleCheckboxes = document.querySelectorAll('.cat-check');
const multipleIds = document.querySelector('.form-id-item-multiple');
const cancelMultipleBtn = document.querySelector('.form-cancel-multiple');
let checks = [];

deleteMultipleBtn.addEventListener('click', () => {
  modalDeleteMultiple.classList.add('active');
});

cancelMultipleBtn.addEventListener('click', (e) => {
  e.preventDefault();
  modalDeleteMultiple.classList.remove('active');
});

multipleCheckboxes.forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    if(checks.includes(checkbox.dataset.itemid)){
      checks.splice(checks.indexOf(checkbox.dataset.itemid, 0), 1);
      multipleIds.value = checks.join(' ');
    }
    else{
      checks.push(checkbox.dataset.itemid);
      multipleIds.value = checks.join(' ');
    }
  })
})
