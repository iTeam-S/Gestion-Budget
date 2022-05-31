import { Line, Bar } from "react-chartjs-2"
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);


const Graph = () => {

    return(
        <>
        <div className="bg-teal m-4 rounded">
            <Line
                data={{
                    labels: ['Red', 'Blue', 'Yellow', "Green",
                    "Purple", 'Orange'],
                    datasets: [
                        {
                            label: "entrants",
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                "rbga(255, 99, 132, 0.2)",
                                "rbga(54, 162, 235, 0.2)",
                                "rgba(255, 206, 86, 0.2)",
                                "rgba(75, 192, 192, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                                "rgba(255, 159, 64, 0.2)",
                            ],
                            fill: true,
                            lineTension: 0.4,
                            backgroundColor: "rgba(0, 0, 0, 0.8)"
                        },
                        {
                            label: "sortants",
                            data: [17, 9, 8, 4, 7, 1],
                            backgroundColor: [
                                "rbga(255, 99, 132, 0.2)",
                                "rbga(54, 162, 235, 0.2)",
                                "rgba(255, 206, 86, 0.2)",
                                "rgba(75, 192, 192, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                                "rgba(255, 159, 64, 0.2)",
                            ],
                            fill: true,
                            lineTension: 0.4,
                            backgroundColor: "#fff"
                        }
                    ],

                }}
                height={400}
                width={600}
                options={{
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }}
            />
        </div>

        <div className="bg-teal m-4 rounded">
        <Bar
            data={{
                labels: ['Red', 'Blue', 'Yellow', "Green",
                "Purple", 'Orange'],
                datasets: [
                    {
                        label: "entrants",
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            "rbga(255, 99, 132, 0.2)",
                            "rbga(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        fill: true,
                        lineTension: 0.4,
                        backgroundColor: "rgba(0, 0, 0, 0.8)"
                    },
                    {
                        label: "sortants",
                        data: [17, 9, 8, 4, 7, 1],
                        backgroundColor: [
                            "rbga(255, 99, 132, 0.2)",
                            "rbga(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        fill: true,
                        lineTension: 0.4,
                        backgroundColor: "#fff"
                    }
                ],

            }}
            height={400}
            width={600}
            options={{
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        }
                    }
                }
            }}
        />
        </div>
        </>
    )
}

export default Graph
