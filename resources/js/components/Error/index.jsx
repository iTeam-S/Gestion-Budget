import ErrorSVG from "./ErrorSVG"
import { StepCurve } from "react-svg-curve"


function Error(props){
  
    return(
        <>
            <ErrorSVG/>
            <svg width="100" height="40" fill="purple">
            <StepCurve
              data={[
                [0, 10],
                [50, 35],
                [100, 0],
              ]}
            />
    </svg>
        </>
    )
}

export default Error