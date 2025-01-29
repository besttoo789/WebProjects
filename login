// backend/server.js
const express = require('express');
const cors = require('cors');
const mysql = require('mysql2');
const app = express();
const PORT = 5000;

// Middleware
app.use(express.json());
app.use(cors());

// Database Connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'password',
    database: 'store_inventory'
});

db.connect(err => {
    if (err) {
        console.error('Database connection failed:', err);
        return;
    }
    console.log('Connected to MySQL database');
});

// Sample Route
app.get('/', (req, res) => {
    res.send('Store Inventory API Running');
});

// User Login API
app.post('/login', (req, res) => {
    const { username, password } = req.body;
    db.query('SELECT * FROM users WHERE username = ? AND password = ?', [username, password], (err, results) => {
        if (err) return res.status(500).json({ error: err });
        if (results.length > 0) {
            res.json({ message: 'Login successful', user: results[0] });
        } else {
            res.status(401).json({ message: 'Invalid credentials' });
        }
    });
});

// Add Product API
app.post('/add-product', (req, res) => {
    const { name, quantity, price } = req.body;
    db.query('INSERT INTO products (name, quantity, price) VALUES (?, ?, ?)', [name, quantity, price], (err, result) => {
        if (err) return res.status(500).json({ error: err });
        res.json({ message: 'Product added successfully', productId: result.insertId });
    });
});

// Reduce Product Quantity API
app.post('/reduce-product', (req, res) => {
    const { id, quantity } = req.body;
    db.query('UPDATE products SET quantity = quantity - ? WHERE id = ?', [quantity, id], (err, result) => {
        if (err) return res.status(500).json({ error: err });
        res.json({ message: 'Product quantity updated successfully' });
    });
});

// Get Product History API
app.get('/history', (req, res) => {
    db.query('SELECT * FROM product_history ORDER BY timestamp DESC', (err, results) => {
        if (err) return res.status(500).json({ error: err });
        res.json(results);
    });
});

// Start Server
app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
