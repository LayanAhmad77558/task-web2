document.getElementById("userForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const formData = new FormData(this);

  fetch("process.php", {
    method: "POST",
    body: formData
  }).then(() => {
    location.reload();
  });
});

document.addEventListener("click", function(e) {
  if (e.target.classList.contains("toggleBtn")) {
    const id = e.target.dataset.id;
    fetch("toggle.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "id=" + id
    })
    .then(res => res.text())
    .then(newStatus => {
      document.querySelector(`.status[data-id='${id}']`).textContent = newStatus;
    });
  }
});
