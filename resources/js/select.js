// Category selector functionality
const categorySearch = document.getElementById("categorySearch");
const categoryDropdown = document.getElementById("categoryDropdown");
const selectedCategories = document.getElementById("selectedCategories");
const categoryOptions = document.querySelectorAll(".category-option");
const categoryElement = document.getElementById("categories");

let selectedCategoryList = [];
let ids = [];

// Show dropdown on focus
categorySearch.addEventListener("focus", function () {
   categoryDropdown.classList.add("show");
});

// Hide dropdown when clicking outside
document.addEventListener("click", function (e) {
   if (!e.target.closest(".relative")) {
      categoryDropdown.classList.remove("show");
   }
});

// Search functionality
categorySearch.addEventListener("input", function () {
   const searchTerm = this.value.toLowerCase();
   categoryOptions.forEach((option) => {
      const categoryText = option.textContent.toLowerCase();
      if (categoryText.includes(searchTerm)) {
         option.style.display = "flex";
      } else {
         option.style.display = "none";
      }
   });
   categoryDropdown.classList.add("show");
});

// Category selection
categoryOptions.forEach((option) => {
   option.addEventListener("click", function () {
      const categoryValue = this.getAttribute("data-category");
      const id = this.getAttribute("data-id");
      const categoryText = this.textContent.trim();

      // Check if category is already selected
      if (!selectedCategoryList.includes(categoryValue)) {
         selectedCategoryList.push(categoryValue);
         ids.push(id);
         categoryElement.value = JSON.stringify(ids);

         // Create chip element
         const chip = document.createElement("div");
         chip.className =
            "category-chip inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200";
         chip.innerHTML = `
                        ${categoryText}
                        <button type="button" class="ml-2 text-blue-600 hover:text-blue-800 focus:outline-none" onclick="removeCategory('${categoryValue}', this)">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    `;
         chip.setAttribute("data-category", categoryValue);

         selectedCategories.appendChild(chip);

         // Hide the option
         this.style.display = "none";
      }

      // Clear search and hide dropdown
      categorySearch.value = "";
      categoryDropdown.classList.remove("show");

      // Reset all options visibility
      categoryOptions.forEach((opt) => {
         if (
            !selectedCategoryList.includes(opt.getAttribute("data-category"))
         ) {
            opt.style.display = "flex";
         }
      });
   });
});

// Remove category function
function removeCategory(categoryValue, button) {
   // Remove from selected list
   selectedCategoryList = selectedCategoryList.filter(
      (cat) => cat !== categoryValue
   );

   // Remove chip element
   button.closest(".category-chip").remove();

   // Show the option again
   const option = document.querySelector(`[data-category="${categoryValue}"]`);
   if (option && option.classList.contains("category-option")) {
      option.style.display = "flex";
   }
}
