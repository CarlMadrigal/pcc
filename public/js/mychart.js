// Line Graph
new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
        labels: [500,600,700,750,800,850,900,950,999,1050],
        datasets: [{ 
            data: [86,114,106,106,107,111,133,221,783,2478],
            label: "Boac",
            borderColor: "#3e95cd",
            fill: false
        }, { 
            data: [282,350,411,502,635,809,947,1402,3700,5267],
            label: "Gasan",
            borderColor: "#8e5ea2",
            fill: false
        }, { 
            data: [168,170,178,190,203,276,408,547,675,734],
            label: "Buenavista",
            borderColor: "#3cba9f",
            fill: false
        }, { 
            data: [40,20,10,16,24,38,74,167,508,784],
            label: "Stacruz",
            borderColor: "#e8c3b9",
            fill: false
        }, { 
            data: [6,3,2,2,7,26,82,172,312,433],
            label: "Torrijos",
            borderColor: "#c45850",
            fill: false
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Overall Coops Performance'
        },
        responsive: true,
        maintainAspectRatio: false
    }
});

// Bar Graph
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
        labels: ["Murrah", "Philippine", "Nelore", "Jafarabadi", "Pandharpuri"],
        datasets: [{
            label: "total",
            backgroundColor: ["#002768", "#002768","#002768","#002768","#002768"],
            data: [2478,5267,734,784,433]
        }]
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: 'Overall Carabaos Breed'
        },
        responsive: true,
        maintainAspectRatio: false
    }
});

// Donut
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
        labels: ["Under-Observation", "Healthy", "Pregnant", "Unhealthy", "Dead"],
        datasets: [
            {
                label: "Status",
                backgroundColor: ["#8791E9", "#002768","#29387C","#4B60BD","#6BA1BD"],
                data: [2478, 5267, 734, 784, 433]
            }
        ]
    },
    options: {
        title: {
            display: true,
            text: 'Overall Status of Carabaos'
        },
        responsive: true,
        maintainAspectRatio: false
    }
});