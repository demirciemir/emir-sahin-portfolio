if (document.querySelector(".contact_form")) {
  const form = document.querySelector(".contact_form"),
    outputText = form.querySelector(".contact_out_text");

  form.onsubmit = (e) => {
    e.preventDefault();
    outputText.innerText = "Sending your message...";
    outputText.removeAttribute("style");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "email.php", true);
    xhr.onload = () => {
      if (xhr.readyState == 4 && xhr.status == 200) {
        let response = xhr.response;
        if (
          response.indexOf("required") != -1 ||
          response.indexOf("valid") != -1 ||
          response.indexOf("failed") != -1
        ) {
          outputText.classList.remove("tc_heading");
          outputText.classList.add("tc_primary");
        } else {
          outputText.classList.remove("tc_primary");
          outputText.classList.add("tc_heading");
          form.reset();
          setTimeout(() => {
            slidingUp(outputText, 500);
          }, 2000);
        }
        outputText.innerText = response;
      }
    };
    let formData = new FormData(form);
    xhr.send(formData);
  };
}