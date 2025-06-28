# 🍎 AI Nutrition Analyzer

The **AI Nutrition Analyzer** is a modern web application that uses your camera or uploaded image to scan food barcodes and analyze their nutrition using the OpenFoodFacts API. It combines AI-generated summaries with a sleek UI to help users make better food choices.

---
## Use Now- 
🔗 https://nutriscanai.netlify.app/

---
## 🚀 Features

- 📸 Real-time barcode scanning using the device camera
- 🖼️ Upload an image to scan barcodes
- 🧠 AI-generated food summary (optional PHP backend with your API key)
- ⚠️ Alerts for high sugar, salt, trans fats, and allergens
- 🚫 Detects internationally banned additives
- 🧮 Health Score (0–10) based on 40+ nutrition parameters
- 📊 Nutritional breakdown in a clean UI
- 🌑 Stylish dark-themed interface

---

## 📁 Project Structure

```
📁 ai-nutrition-analyzer
├── index.html         # Main frontend file
├── analyze.php        # (Optional) AI summary generation using backend
└── README.md          # Project documentation
```

> ⚠️ If you're not using PHP or don't provide an API key, the app will show "AI summary unavailable."

---

## 🛠️ Setup Instructions

1. **Clone the repository**  
   ```bash
   git clone https://github.com/shivanggupta1509/Nutriscan.git
   cd Nutriscan
   ```

2. **Open in browser**  
   - Just double-click `index.html` or open it with a browser like Chrome.

3. **Optional: Use with PHP Backend (for AI summaries)**  
   - Install PHP or use tools like XAMPP / MAMP.
   - Start a server (example below):
     ```bash
     php -S localhost:8000
     ```
   - Open `http://localhost:8000` in your browser.
   - 📌 **Edit `analyze.php` to insert your own Open Router API key** (or any AI API you are using).

---

## 🔐 API Key Required for AI (IMPORTANT)

If you're using the AI summary feature:

- You must insert your own API key (e.g., from [Open Router](https://openrouter.ai/)) in `analyze.php`.
  
Example inside `analyze.php`:

```php
$openrouter_api_key = "sks..."// Replace this with your actual key
$model = "model of ai you will be using"
```


- Without the key, the backend will fail to fetch summaries.

---

## 🔧 Technologies Used

- **HTML5, CSS3, JavaScript**
- **OpenFoodFacts API** – Nutrition data
- **BarcodeDetector API** – Barcode reading via camera
- **PHP (Optional)** – AI summaries using external APIs

---

## 🔗 API Reference

- **OpenFoodFacts API**  
  - Endpoint:  
    ```
    https://world.openfoodfacts.org/api/v0/product/{barcode}.json
    ```

---

## 🧠 AI Summary Integration (Optional)

The frontend sends this to `analyze.php`:

```json
{
  "ingredients": "sugar, milk solids, cocoa butter...",
  "nutrition": {
    "sugars": 23.4,
    "fiber": 2.1,
    ...
  }
}
```

Your backend should return a simple plain-text summary based on the input.

---

## ⚙️ Permissions

- **Camera access** is only used for scanning and never stored
- If camera permission is blocked, uploading an image still works

---

## 📌 To-Do / Suggestions

- [ ] Add PWA support
- [ ] Add user history or bookmarks
- [ ] Support multi-language summaries
- [ ] Voice-based nutrition insights (experimental idea)

---

## 👨‍💻 Author

**Shivang Gupta**  
Frontend Developer | Creator of AI Nutrition Analyzer  
📧 shivangmaheshgupta@gmail.com

---

## 📄 License

MIT License – Feel free to use, modify, or build on top of this project.

---

## 🧪 Example Use Case

1. Scan or upload a food product image
2. The app fetches data from OpenFoodFacts
3. Calculates score and displays alerts
4. AI (optional) generates a summary using your API key
