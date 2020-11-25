const toggleDistrict = () => {
  const isBrazilian = document.getElementById('isBrazilian');
  const districInput = document.getElementById('districtInput');
  if (isBrazilian.checked) {
    districInput.style.display = 'block';
  } else {
    districInput.style.display = 'none';
  }
}

const handleSubmit = () => {
  document.getElementById('formGuests').submit();
}



const resetVariables = () => {
  localStorage.setItem('forms', '');
  localStorage.setItem('currentForm', '');
  window.location.reload();
}