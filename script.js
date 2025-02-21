const navDialog = document.getElementById("nav-dialog");

function handleMenu(){
    navDialog.classList.toggle('hidden')
}

document.querySelectorAll("nav a").forEach(link => {
  link.addEventListener("click", function(event) {
      event.preventDefault(); // Prevent default navigation if needed
      // Add your logic here
      navDialog.classList.toggle('hidden')
      const targetId = this.getAttribute("href").substring(1); // Get the target section ID
      const targetSection = document.getElementById(targetId);
      if (targetSection) {
        targetSection.scrollIntoView({ behavior: "smooth" }); // Smooth scrolling
    }
  });
});




// Show button when user scrolls down
window.onscroll = function () {
    let btn = document.getElementById("goTopBtn");
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
      btn.style.display = "block";
    } else {
      btn.style.display = "none";
    }
  };
  
  // Scroll smoothly to the top
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
  }
  

  // Show the popup
  const popup = document.getElementById("popup");
  popup.classList.remove("opacity-0");
  popup.classList.add("opacity-100");
  
  // Hide after 5 seconds
  setTimeout(() => {
      popup.classList.remove("opacity-100");
      popup.classList.add("opacity-0");
  }, 5000);


  // Animation 
  