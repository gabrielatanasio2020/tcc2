const toggleDefineForms = () => {
  const savedForms = localStorage.getItem('forms');
  const savedCurrentForm = localStorage.getItem('currentForm');
  if (savedForms) {
    document.getElementById('defineForms').style.display = 'none';
    document.getElementById('guestForm').style.display = 'block';
    document.getElementById('currentForm').innerHTML = `${savedCurrentForm}/${savedForms} Hospede`;
  } else {
    document.getElementById('defineForms').style.display = 'block';
  }
}

const toggleGuestForm = (forms) => {
  if (forms <= 0) {
    document.getElementById('guestForm').style.display = 'none';
  } else {
    document.getElementById('guestForm').style.display = 'block';
    localStorage.setItem('currentForm', 1);
    const savedCurrentForm = localStorage.getItem('currentForm');
    document.getElementById('currentForm').innerHTML = `${savedCurrentForm}/${forms} Hospede`;
  }
}

const defineGuestsNumber = () => {
  const guestsNumber = document.getElementById('guestsNumber').value;
  localStorage.setItem('forms', guestsNumber);
  document.getElementById('defineForms').style.display = 'none';
  toggleGuestForm(guestsNumber);
}


const toggleDistrict = () => {
  const isBrazilian = document.getElementById('isBrazilian');
  const districInput = document.getElementById('district');
  if (isBrazilian.checked) {
    districInput.style.display = 'block';
  } else {
    districInput.style.display = 'none';
  }
}

const handleSubmit = () => {
  const savedForms = localStorage.getItem('forms');
  const savedCurrentForm = localStorage.getItem('currentForm');


  if (parseInt(savedCurrentForm) <= parseInt(savedForms)){
    const nextForm = parseInt(savedCurrentForm) + 1;
    localStorage.setItem('currentForm', nextForm);    
    document.getElementById('formGuests').submit();

  }else {
    alert('limite atingido!');
      document.getElementById('currentForm').innerHTML = `Finalizado!`;
      window.location.href ="./login_usuarios.php";
  } 
}

const resetVariables = () => {
  localStorage.setItem('forms', '');
  localStorage.setItem('currentForm', '');
  window.location.reload();
}
