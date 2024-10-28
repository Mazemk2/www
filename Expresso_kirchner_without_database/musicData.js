const express = require('express');
const router = express.Router();

const musicData = {
    'try_it_once': {
        title: "Tonalität und Harmonik",
        txt: `
    „There There“ von Radiohead (aus dem Album Hail to the Thief, 
    2003) ist in vielerlei Hinsicht ein faszinierendes Beispiel 
    für Radioheads komplexen Umgang mit Tonalität und Harmonien. 
    Die Grundtonart ist nominell F#-Moll, aber die Verwendung von 
    Modi, chromatischen Verzierungen und subtilen harmonischen 
    Verschiebungen erzeugt eine Atmosphäre, die sich nur schwer 
    eindeutig in die traditionelle Tonalität einordnen lässt.
    
    Die Verse basieren im Wesentlichen auf einer alternativen diatonischen
    Skala, wobei Radiohead hier bevorzugt auf modale Klangstrukturen zurückgreift,
    insbesondere den dorischen Modus, der in F# dorisch 
    (F#-Moll mit erhobenem 6. Ton: D#) angedeutet wird. 
    Dies gibt der ansonsten mollgeprägten Atmosphäre eine 
    schwebende, fast optimistische Nuance. 
    Die wechselnde harmonische Grundlage führt zu einer Spannung 
    zwischen Moll und Dur, die sich jedoch nicht in klare 
    tonale Schubladen stecken lässt.` }
    
};

router.get('/try_it_once', (req,res) => {
    res.render('try_it_once', musicData['try_it_once']);

});

module.exports = router;