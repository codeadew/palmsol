  function sendFormData(url, formElement, callback) {
    const formData = new FormData(formElement);

    fetch(url, {
      method: "POST",
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      callback(data);
    })
    .catch(error => {
      callback({status: 'error', message: 'Network error. Please try again.'});
    });
  }