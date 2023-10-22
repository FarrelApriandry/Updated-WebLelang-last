window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

const fileInput = document.getElementById('image');
  const imagePreview = document.getElementById('imagePreview');

  image.addEventListener('change', (event) => {
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = (e) => {
        const image = new Image();
        image.src = e.target.result;
        image.alt = 'Uploaded Image';

        // Remove the file input and replace it with the image
        image.style.display = 'none';
        imagePreview.innerHTML = '';
        imagePreview.appendChild(image);
        imagePreview.style.display = 'block';
      };

      reader.readAsDataURL(file);
    } else {
      imagePreview.innerHTML = '';
      imagePreview.style.display = 'none';
    }
  });

  function uploadFile(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Create a new FormData object to send the form data including the file
    var formData = new FormData(document.querySelector('form'));

    // Make an AJAX request to submit the form data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'admin-upload-page.php', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            // Successfully uploaded, you can redirect or display a message here
            location.href = './admin-auction-page.php';
        } else {
            // Handle errors here
            alert('Error uploading the file');
        }
    };

    xhr.send(formData);
}