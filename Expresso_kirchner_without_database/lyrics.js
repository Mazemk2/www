const express = require('express');
const router = express.Router();

// Lyrics-Daten
const lyricsData = {
    'ok_computer': {
        title: 'OK Computer',
        lyrics: `In the next world war
        In a next world war
        In a next world war
        In a next world war
        In a next world war`
    },
    'kid_a': {
        title: 'Kid A',
        lyrics: `I’m not here
        This isn’t happening
        I’m not here
        I’m not here`
    },
    'amnasiac': {
        title: 'I Might Be Wrong',  // Großschreibung korrigiert
        lyrics: `I might be wrong
        I might be wrong
        I could have sworn I saw a light coming on
        I used to think
        I used to think
        There was no future left at all
        I used to think
        Open up, begin again
        Let's go down the waterfall
        Think about the good times and never look back
        Never look back
        What would I do?
        What would I do?
        If I did not have you?
        Open up and let me in
        Let's go down the waterfall
        Have ourselves a good time
        It's nothing at all
        Nothing at all
        Nothing at all
        Keep it moving
        Keep it moving
        Ah, ah
        Ah` // Backticks für mehrzeilige Strings verwendet , Backticks remember it Backticks eine Idee verwende Amerikanisches Tastaturlayout
    }
};

// Route für die OK Computer Lyrics
router.get('/ok_computer', (req, res) => {
    res.render('ok_computer', lyricsData['ok_computer']);
});

// Route für die Kid A Lyrics
router.get('/kid_a', (req, res) => {
    res.render('kid_a', lyricsData['kid_a']);
});

// Route für die I Might Be Wrong Lyrics
router.get('/amnasiac', (req, res) => {
    res.render('amnasiac', lyricsData['amnasiac']); // Diese Route hinzufügen
});

module.exports = router;
