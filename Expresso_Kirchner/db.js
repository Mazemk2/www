const mongoose = require('mongoose');
const secrets = require('./secrets.js');

const uri = `mongodb://${secrets.db_username}:${secrets.db_password}@${secrets.db_server}/${secrets.db_database}`;
mongoose.connect(uri, { useNewUrlParser: true, useUnifiedTopology: true });

const UserSchema = new mongoose.Schema({
  username: String,
  name: String,
  email: String,
  password_hash: String,
});

const User = mongoose.model('User', UserSchema);

module.exports = { User };