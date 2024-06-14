const express = require('express');
const app = express();
const port = 3000;

// Sử dụng thư mục "public" để chứa các file tĩnh
app.use(express.static('public'));

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
