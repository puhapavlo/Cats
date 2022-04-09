const modalDeleteAll = document.querySelector('.form-delete-all');
const deleteAllBtn = document.querySelector('.cats-delete-all');


deleteAllBtn.addEventListener('click', () => {
  modalDeleteAll.classList.add('active');
})
