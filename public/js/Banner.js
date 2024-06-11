import React from 'react';

const Banner = ({ imageUrl }) => {
    const bannerStyle = {
        position: 'fixed',
        top: '0%',
        width: '320px',
        height: '100vh',
        backgroundColor: '#f1f1f1',
        textAlign: 'center',
        zIndex: '1000',
        backgroundSize: 'cover',
        backgroundRepeat: 'no-repeat',
        backgroundPosition: 'center',
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center',
        backgroundImage: `url(${imageUrl})`,
    };

    return <div style={bannerStyle}></div>;
};

export default Banner;