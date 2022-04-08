const editBtns = document.querySelectorAll('.cats-edit');
const modalEdit = document.querySelector('.form-edit');
const cancelEditBtn = document.querySelector('.form-cancel-edit');
const idItemEdit = document.querySelector('.form-id-item-edit');
const itemsEmail = document.querySelectorAll('.cats-email-link');
const itemsName = document.querySelectorAll('.cats-name-value');
const nameEdit = document.querySelector('.form-name-edit');
const emailEdit = document.querySelector('.form-email-edit');

editBtns.forEach(editBtn => {
  editBtn.addEventListener('click', () => {
    modalEdit.classList.add('active');
    idItemEdit.value = editBtn.dataset.itemid;
    itemsName.forEach(name => {
      if(name.dataset.itemid === editBtn.dataset.itemid){
        nameEdit.value = name.textContent;
      }
    });
    itemsEmail.forEach(email => {
      if(email.dataset.itemid === editBtn.dataset.itemid){
        emailEdit.value = email.outerText;
      }
    });
  })
});

cancelEditBtn.addEventListener('click', (e) => {
  e.preventDefault();
  modalEdit.classList.remove('active');
});
