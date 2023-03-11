SELECT Tel1_Etablissement, COUNT( Tel1_Etablissement )
FROM `etablissement`
GROUP BY Tel1_Etablissement
HAVING COUNT( Tel1_Etablissement ) >1



SELECT `Nom_Etablissement` , Tel1_Etablissement 
FROM `etablissement`
WHERE `Tel1_Etablissement`
IN (

SELECT Tel1_Etablissement
FROM `etablissement`
GROUP BY Tel1_Etablissement
HAVING COUNT( Tel1_Etablissement ) >1
)
ORDER BY Tel1_Etablissement



SELECT `Nom_Etablissement` , Tel2_Etablissement
FROM `etablissement`
WHERE `Tel2_Etablissement`
IN (

SELECT Tel2_Etablissement 
FROM `etablissement`
GROUP BY Tel2_Etablissement
HAVING COUNT( Tel2_Etablissement ) >1
)
ORDER BY Tel2_Etablissement


SELECT `Nom_Etablissement` , Contact_DE1
FROM `etablissement`
WHERE Contact_DE1
IN (

SELECT Contact_DE1
FROM `etablissement`
GROUP BY Contact_DE1
HAVING COUNT( Contact_DE1) >1
)
ORDER BY Contact_DE1







SELECT *
FROM `etablissement`
WHERE `Email_etablissement`
IN (
'albisept@yahoo.fr', 'diabydaouda23@gmail.com', 'esicomkorhogo@gmail.com', 'etablissements.ovm@gmail.com', 'marieauzey@gmail.com'
)
ORDER BY `Email_etablissement`
