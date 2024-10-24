const mongoose = require('mongoose');

mongoose.connect('mongodb://localhost:27017/deineDatenbank', {
  useNewUrlParser: true,
  useUnifiedTopology: true
})
.then(() => {
  console.log('Mit MongoDB verbunden');
})
.catch((error) => {
  console.error('Fehler beim Verbinden mit MongoDB:', error);
});
