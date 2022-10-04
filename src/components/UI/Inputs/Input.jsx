import React from 'react';
import classes from './Input.module.css';

const Input = (props) => {
    let icon;
    switch(props.icon){
        case 'email':
            icon = <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.9026 8.85117L13.4593 12.4642C12.6198 13.1302 11.4387 13.1302 10.5992 12.4642L6.11841 8.85117" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9089 21C19.9502 21.0084 22 18.5096 22 15.4384V8.57004C22 5.49886 19.9502 3.00003 16.9089 3.00003H7.09114C4.04979 3.00003 2 5.49886 2 8.57004V15.4384C2 18.5096 4.04979 21.0084 7.09114 21H16.9089Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>;
            break;
        case 'password':
            icon = <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.4235 9.44783V7.30083C16.4235 4.78783 14.3855 2.74983 11.8725 2.74983C9.35949 2.73883 7.31349 4.76683 7.30249 7.28083V7.30083V9.44783" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6832 21.2496H8.04224C5.94824 21.2496 4.25024 19.5526 4.25024 17.4576V13.1686C4.25024 11.0736 5.94824 9.37662 8.04224 9.37662H15.6832C17.7772 9.37662 19.4752 11.0736 19.4752 13.1686V17.4576C19.4752 19.5526 17.7772 21.2496 15.6832 21.2496Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.8629 14.2027V16.4237" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>;
            break;
        default:
            icon = null;
            break;
    }
    function blurHandler(){
        console.log('blur');
    }
    return (
        <div className={classes.container}>
            <div className={classes.icon}>
                {icon}
            </div>
            <input
                className={[classes.input].join(' ')}
                {...props}
                onChange={blurHandler}
            />
            <div className={classes.buttons}>
                {
                    props.visible
                    ?
                        <svg className={classes.visible} width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1077 16.0354C18.1077 17.1994 17.1637 18.1427 15.9997 18.1427C14.8357 18.1427 13.8923 17.1994 13.8923 16.0354C13.8923 14.8707 14.8357 13.9274 15.9997 13.9274C17.1637 13.9274 18.1077 14.8707 18.1077 16.0354Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9986 20.9033C18.5373 20.9033 20.8593 19.0779 22.1666 16.0353C20.8593 12.9926 18.5373 11.1673 15.9986 11.1673H16.0013C13.4626 11.1673 11.1406 12.9926 9.83325 16.0353C11.1406 19.0779 13.4626 20.9033 16.0013 20.9033H15.9986Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#23262F" stroke-opacity="0.1"/>
                        </svg>
                    : null
                }
                {
                    props.remove
                    ?
                        <svg className={classes.remove} width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 12L12 20" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12L20 20" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#23262F" stroke-opacity="0.1"/>
                        </svg>
                    : null
                }
            </div>
        </div>
    );
};

export default Input;
