import React from 'react';
import classes from './AdVip.module.css';

const AdVip = ({ad}) => {
    return (
        <div className={classes.ad}>
            <div className={classes.up}>
                <div className={classes.image}><img src={'./images/advertisement/vip/'+ad.ad_image} alt={ad.ad_title} /></div>
                <p className={classes.title}>{ad.ad_title}</p>
                <p className={classes.region}>
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.08332 7.75038C9.08332 6.59932 8.15063 5.66663 7.00041 5.66663C5.84935 5.66663 4.91666 6.59932 4.91666 7.75038C4.91666 8.9006 5.84935 9.83329 7.00041 9.83329C8.15063 9.83329 9.08332 8.9006 9.08332 7.75038Z" stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99959 16.5C6.00086 16.5 0.75 12.2486 0.75 7.80274C0.75 4.3222 3.54758 1.5 6.99959 1.5C10.4516 1.5 13.25 4.3222 13.25 7.80274C13.25 12.2486 7.99832 16.5 6.99959 16.5Z" stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {ad.ad_region}
                </p>
            </div>
            <div className={classes.down}>
                <div className={classes.profile}>
                    <div className={classes.avatar}><img src={'./images/advertisement/vip/'+ad.profile_image} alt={ad.profile_name}/></div>
                    <div className={classes.info}>
                        <p className={classes.name}>{ad.profile_name}</p>
                        <div className={classes.status}>
                            <p className={classes.rank}>{ad.profile_rank}</p><p className={classes.rewiews}>({ad.profile_rewiews})</p>
                        </div>
                    </div>
                </div>
                <div className={classes.publish}>
                    <p className={classes.text}>Опубликовано</p>
                    <p className={classes.date}>{ad.ad_date}</p>
                </div>
            </div>
        </div>
    );
};

export default AdVip;
